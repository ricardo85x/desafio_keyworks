<template>
  <CFlex
    width="100%"
    wrap="nowrap"
    align="center"
    justify="center"
    :_hover="{ color: 'gray.100', cursor: 'pointer' }"
    @mouseover="hover = true"
    @mouseleave="hover = false"
  >
    <CIcon
      name="circle-plus"
      title="Adicionar Tarefa"
      size="38"
      color="pink.500"
      bg="white"
      border-radius="50%"
      border-color="pink.500"
    />

    <c-box
      v-if="hover"
      as="button"
      position="absolute"
      background="pink.500"
      color="gray.100"
      left="18px"
      padding="2px 10px"
      border-radius="10"
      font-size="1.5rem"
      font-weight="bold"
      white-space="nowrap"
      @click="open"
    >
      ＋ CRIAR CARD
    </c-box>

    <c-modal :is-open="isOpen" :on-close="close">
      <c-modal-content
        ref="content"
        rounded-top="lg"
        @submit.prevent="handleSubmit"
      >
        <c-modal-header rounded-top="lg" bg="green.500" color="gray.900">
          Criar Tarefa</c-modal-header
        >
        <c-modal-close-button />
        <c-modal-body>
          <c-form-control is-required>
            <c-form-label for="fcategory">Categoria</c-form-label>
            <c-select
              id="fcategory"
              v-model="form.category"
              placeholder="Selecione a categoria"
            >
              <option
                v-for="key in Object.keys(category)"
                :key="key"
                :value="key"
              >
                {{ category[key] }}
              </option>
            </c-select>
            <c-form-label for="ftag">Etiqueta</c-form-label>
            <c-input id="ftag" v-model="form.tag" placeholder="" />

            <c-form-label for="fcode">Codigo</c-form-label>
            <c-input id="fcode" v-model="form.code" placeholder="" />

            <c-form-label for="ftitle">Titulo</c-form-label>
            <c-input id="ftitle" v-model="form.title" placeholder="" />

            <c-form-label for="fproject">Projeto</c-form-label>
            <c-input id="fproject" v-model="form.project" placeholder="" />

            <c-form-label for="fexpected_date">Data Prevista</c-form-label>
            <c-input
              id="fexpected_date"
              v-model="form.expected_date"
              type="date"
              placeholder=""
            />

            <c-form-label for="fdescription">Data Prevista</c-form-label>
            <c-input
              id="fdescription"
              v-model="form.description"
              placeholder="Descrição"
            />
          </c-form-control>
        </c-modal-body>
        <c-modal-footer>
          <c-button
            variant-color="blue"
            mr="3"
            @click.stop.prevent="handleSubmit"
          >
            Save
          </c-button>
          <c-button @click="close">Cancel</c-button>
        </c-modal-footer>
      </c-modal-content>
      <c-modal-overlay />
    </c-modal>
  </CFlex>
</template>

<script>
/* eslint-disable camelcase */
import {
  CFlex,
  CBox,
  CIcon,
  CModal,
  CModalOverlay,
  CModalContent,
  CModalHeader,
  CModalFooter,
  CModalBody,
  CModalCloseButton,
  CFormControl,
  CFormLabel,
  CInput,
  CSelect,
} from '@chakra-ui/vue'

import { category } from '~/components/DashBoard/DashBoard.vue'

export default {
  name: 'SideBarIcon',
  components: {
    CIcon,
    CFlex,
    CBox,

    CModal,
    CModalOverlay,
    CModalContent,
    CModalHeader,
    CModalFooter,
    CModalBody,
    CModalCloseButton,
    CFormControl,
    CFormLabel,
    CInput,
    CSelect,
  },
  data() {
    return {
      hover: false,
      isOpen: false,
      category,

      form: {
        category: '',
        tag: 'Desenvolvimento',
        code: '#12345',
        title: 'Tarefa 1',
        project: 'Company',
        expectedDate: '',
        description: '',
      },
    }
  },
  methods: {
    open() {
      this.isOpen = true
    },
    close() {
      this.isOpen = false
    },

    async handleSubmit() {
      console.log(this.form)
      const {
        category,
        tag,
        code,
        title,
        project,
        expected_date,
        description,
      } = this.form
      if (
        category &&
        tag &&
        code &&
        title &&
        expected_date &&
        project &&
        description
      ) {

        const newTask = {
          ...this.form,
          expected: '00:30',
          balance: '+00:10',
          status: 'in-time',
          time: '1h',
          notifications: 0,

          team: JSON.stringify(['PH']),
        }

        await this.$store.dispatch('tasks/addTask', newTask)

        this.$toast({
          title: 'Tarefa Criada',
          status: 'success',
          duration: 10000,
          isClosable: true,
        })

        this.$nuxt.$emit('newTask')

        this.close()
      } else {
        this.$toast({
          description: 'Preencha todos os campos...',
          title: 'Atenção',
          status: 'warning',
          duration: 10000,
          isClosable: true,
        })
      }
    },
  },
}
</script>
