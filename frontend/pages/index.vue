<template>
  <div class="container">
    <CBox
      display="grid"
      w="100vw"
      h="100vh"
      grid-template-columns="155px 1fr 155px"
    >
      <SideBar  />
      <DashBoard  />
      <RightBar />
    </CBox>
  </div>
</template>

<script lang="js">
import {
  CBox,

} from '@chakra-ui/vue'

import SideBar from "~/components/SideBar/SideBar"
import DashBoard from "~/components/DashBoard/DashBoard"
import RightBar from "~/components/RightBar/RightBar"


export default {
  name: 'IndexPage',
  components: {
    CBox,
    RightBar,
    SideBar,
    DashBoard
  },

  data () {
    return {
    }
  },
}
</script>
