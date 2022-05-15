<template>
  <CFlex align="center" grid-gap="5">
    <CInputGroup>
      <CInputLeftElement
        ><CIcon name="magnifying-glass" color="gray.300"
      /></CInputLeftElement>
      <CInput
        v-model="search"
        type="text"
        placeholder="Pesquisar por Tarefa"
        size="lg"
      />
    </CInputGroup>
    <CButtonGroup>
      <CButton
        box-shadow="0px 0px 5px 2px #888888"
        size="md"
        bg="green.500"
        :_hover="{ bg: 'green.400' }"
        right-icon="filter"
        >Filtro</CButton
      >
    </CButtonGroup>
  </CFlex>
</template>

<script>
import {CFlex, CInput, CInputGroup, CInputLeftElement, CIcon } from '@chakra-ui/vue'

export default {
  name: 'SearchBox',
  components: {
      CFlex,
    CInput,
    CInputGroup,
    CInputLeftElement,
    CIcon,
  },

  data() {
    return {
      search: '',
    }
  },
}
</script>