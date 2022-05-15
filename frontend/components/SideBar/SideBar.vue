<template>
  <CFlex
    position="sticky"
    top="0"
    left="0"
    width="100%"
    height="100%"
    direction="row"
    z-index="998"
  >
    <CFlex
      width="77px"
      height="100%"
      direction="column"
      align="center"
      background="green.500"
      grid-gap="6"
      rounded-top="15"
    >
      <CImage
        size="70"
        mt="2"
        :src="require('~/assets/logo.png')"
        alt="Logo"
        box-shadow="0px 0px 8px 0px #888888"
        border-radius="50%"
      />
      <SideBarIcon name="bars" label="Menu" />
      <SideBarIcon selected="true" name="table-cells-large" label="Tarefas" />
      <SideBarIcon name="bell" label="Notificações" />
      <SideBarIcon name="calendar" label="Gestão do Tempo" />
      <SideBarIcon name="bullseye" label="Gestão de Processos" />
      <SideBarIcon name="chart-column" label="Relatório" />
      <SideBarIcon name="square-plus" label="Cadastros" />
      <SideBarIcon name="gear" label="Parãmetros" />
      <AddCardIcon />
    </CFlex>
    <CFlex
      width="77px"
      height="100%"
      align="center"
      direction="column"
      background="gray.50"
      mt="0"
      pt="3"
      grid-gap="3"
      box-shadow="4px 0px 4px 0px rgba(1,1,1,0.1)"
    >
      <SideBarIcon no-hover="true" name="suitcase" label="Mala" />
      <SideBarIcon
        hover-color="pink.500"
        name="chevron-right"
        label="Parãmetros"
      />

      <NotificationCircle>3</NotificationCircle>
    </CFlex>
  </CFlex>
</template>

<script>
import { CFlex, CImage } from '@chakra-ui/vue'
import SideBarIcon from '~/components/SideBar/SideBarIcon'
import AddCardIcon from '~/components/SideBar/AddCardIcon'
import NotificationCircle from '~/components/UI/NotificationCircle'

export default {
  name: 'SideBar',
  components: {
    SideBarIcon,
    AddCardIcon,
    CFlex,
    CImage,
    NotificationCircle,
  },
}
</script>
