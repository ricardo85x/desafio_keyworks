<template>
  <CFlex width="100%" direction="column">
    <Header />

    <client-only only placeholder="Loading...">
      <CGrid
        v-if="!loading"
        :key="tasks_key"
        width="100%"
        template-columns="repeat(5, 300px)"
        gap="4"
        p="10"
      >
        <BoardItem
          v-for="category_key in Object.keys(category)"
          :key="category_key"
          :category="category"
          :category_key="category_key"
          :category_count="categoryCount"
          :data_category="dataCategory[category_key]"
          :on_end="onEnd"
        />
      </CGrid>
    </client-only>
  </CFlex>
</template>

<script>
import { CFlex, CGrid } from '@chakra-ui/vue'
import Header from '~/components/DashBoard/Header.vue'
import BoardItem from '~/components/DashBoard/BoardItem'

export const category = {
  wait: 'Aguardando',
  running: 'Em andamento',
  pendency: 'Pendência',
  done: 'Finalizado',
  other: 'Outros',
}

const status = {
  'in-time': {
    title: 'EM DIA',
    color: '#107154',
    textColor: 'gray.50',
  },
  alert: {
    title: 'ATENÇÃO',
    color: 'yellow.500',
    textColor: 'gray.900',
  },
  late: {
    title: 'Em ATRASO',
    color: 'red.500',
    textColor: 'gray.50',
  },
}

export default {
  name: 'DashBoard',

  components: {
    CFlex,
    Header,
    CGrid,
    BoardItem,
  },

  data() {
    return {
      loading: true,
      data: [],
      category,
      categoryCount: {},
      dataCategory: {},
      dataW: [],
      dataR: [],
      dataTask: {},
      tasks_key: 1,
      filterText: ''
    }
  },

  async fetch() {
    await this.initializeData()
    this.loading = false
  },

  created() {
    this.$nuxt.$on('newTask', () => {
      console.log('Leets gooooooo')
      this.initializeData()
    })
  },

  methods: {
    parseTeam(obj) {
      try {
        const team = JSON.parse(obj)
        if (Array.isArray(team)) {
          team.forEach((t) => {
            if (!(typeof t === 'string' && t.length < 3)) {
              return []
            }
          })
          return team
        }
      } catch (e) {
        return []
      }
      return []
    },
    async initializeData() {
      try {
        const { data } = await this.$store.dispatch('tasks/getTasks')

        const categoryCount = Object.keys(category).reduce((acc, item) => {
          acc[item] = data.filter((d) => d.category === item).length
          return acc
        }, {})

        const formattedData = data.map((d, i) => ({
          ...d,
          team: this.parseTeam(d.team),
          categoryCount: categoryCount[d.category],
          categoryName: category[d.category],
          statusInfo: status[d.status],
        }))

        this.data = formattedData
        this.categoryCount = categoryCount
        this.generateDataCategory(formattedData)

        // force update components
        this.tasks_key = this.tasks_key + 1
      } catch (e) {
        this.$toast({
          description: "Backend esta rodando?",
          title: 'Erro ao buscar dados',
          status: 'error',
          duration: 10000,
          isClosable: true,
        })
      }
    },
    generateDataCategory(data) {
      this.dataCategory = {}

      data.forEach((d) => {
        this.dataTask[d.category] = []
      })

      Object.keys(this.category).forEach((cat) => {
        this.dataCategory[cat] = []
      })

      data.forEach((d) => {
        if (d.category in this.dataCategory) {
          this.dataCategory[d.category].push(d)
        } else {
          this.dataCategory[d.category] = [d]
        }
      })
    },

    async onEnd(element) {
      if (
        element.from?.hasAttribute('data-source') &&
        element.to?.hasAttribute('data-source')
      ) {
        const categoryFrom = element.from.getAttribute('data-source')
        const categoryTo = element.to.getAttribute('data-source')

        const newIndex = element.newDraggableIndex + 1
        const item = element.item._underlying_vm_

        const newList = this.data.map((i) => {
          return { ...i, category: i.id === item.id ? categoryTo : i.category }
        })

        try {
          if (categoryFrom !== categoryTo) {
            await this.$store.dispatch('tasks/updateTaskOrderCategory', {
              id: item.id,
              data: { category: categoryTo, order: newIndex },
            })
          } else {
            await this.$store.dispatch('tasks/updateTaskOrderCategory', {
              id: item.id,
              data: { category: categoryTo, order: newIndex },
            })
          }
        } catch (e) {
          this.$toast({
            description: 'Erro ao atualizar base de dados',
            title: 'Atenção',
            status: 'error',
            duration: 10000,
            isClosable: true,
          })
        }

        this.data = newList
        this.generateDataCategory(this.data)
      }
    },
  },
}
</script>