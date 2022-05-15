<template>
    <CBox mt="5">
        <CImage w="30px" :src="require('~/assets/bell.png')" alt="sino" />
        <CBox 
            position="relative"  
            top="-17px"
            left="18px"
        >
            <NotificationCircle
                
                w="4" 
                h="4" 
                font-size="12" 
                bg="pink.500"
            >
            2
            </NotificationCircle> </CBox>
    </CBox>
</template>
<script>
import { CBox, CImage } from '@chakra-ui/vue'
import NotificationCircle from "~/components/UI/NotificationCircle"
export default {
    name: "NotificationBell",
    components: {
        CBox, CImage, NotificationCircle
    }
}
</script>