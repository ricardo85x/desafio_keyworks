<template>
    <CFlex
        direction="column"
        bg="gray.200"
        >

          <BoardItemHeader
            :category="category[category_key]"
            time="1H"
            :count="categoryCount[category_key]"
          />

          <draggable
            v-model="dataCategory"
            :data-source="category_key"
            group="tasks"
            @end="$attrs.on_end"
       
          >
            <BoardItemBody
              v-for="item in dataCategory"
              :key="item.id"
              :item="item"
            />
          </draggable>
        </CFlex>
</template>

<script>

import { CFlex } from '@chakra-ui/vue'
import draggable from 'vuedraggable'
import BoardItemBody from '~/components/DashBoard/BoardItemBody'
import BoardItemHeader from '~/components/DashBoard/BoardItemHeader'

export default {
     components: {
        CFlex,
        BoardItemBody,
        BoardItemHeader,
        draggable,
    },

    data() {
        return {
            category: this.$attrs.category,
            category_key: this.$attrs.category_key,
            categoryCount: this.$attrs.category_count,
            dataCategory: this.$attrs.data_category,  
        }
    },
}
</script>