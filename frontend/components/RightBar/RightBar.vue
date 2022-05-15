<template>
  <CFlex 
    position="sticky"
    top="0"
    right="0"
    width="100%"
    height="100%"
    direction="row"
  >
    <CFlex 
      width="77px"
      height="100%"
      align="center"
      direction="column"
      background="gray.50"
      mt="0"
      pt="3"
      grid-gap="3"
      box-shadow="0px 0px 4px 4px rgba(1,1,1,0.1)"
    >
        <SideBarIcon  no-hover="true" name="right-left" label="Completo" />
        <SideBarIcon hover-color="pink.500" name="chevron-left" label="Esconder" />

        <NotificationCircle>2</NotificationCircle>

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
      box-shadow="0px 0px 4px 4px rgba(1,1,1,0.1)"
    >
        <SideBarIcon  no-hover="true" name="circle-check" label="Completo" />
        <SideBarIcon hover-color="pink.500" name="chevron-left" label="Esconder" />

        <NotificationCircle>2</NotificationCircle>

    </CFlex>

  </CFlex>
</template>

<script>

import { CFlex } from '@chakra-ui/vue'
import SideBarIcon from "~/components/SideBar/SideBarIcon"
import NotificationCircle from "~/components/UI/NotificationCircle"

export default {
  name: "SideBar",
  components: {
    SideBarIcon,
    CFlex,
    NotificationCircle
    
  },



}
</script>
