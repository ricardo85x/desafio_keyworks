<template>
    <CFlex

    
        border="2px"
        border-color="green.500"
        border-left-width="20px"
        py="0"
        px="3"
        justify="space-between"
        align="center"
        bg="gray.50"

    >
        <CFlex color="green.800" direction="row" align="center" grid-gap="5">
            <CHeading 
                font-weight="400"
            > Tarefas </CHeading>

            <CFlex  mt="5px" direction="row" align="center" >
                <CIcon name="clock" />
                <CText ml="4px" mr="12px" >5h</CText>

                <NotificationCircle 
                    
                    bg="green.800"
                    w="5" h="5"
                    font-size="15"
                >10</NotificationCircle>

            </CFlex>
        </CFlex>


        <CFlex direction="row" grid-gap="5" align="center">
            <SearchBox />
            

            <NotificationBell />

            <CImage :src="require('~/assets/expand.png')" w="30px" />


        </CFlex>
    
    
    </CFlex>
</template>

<script>
import { CFlex, CHeading, CIcon, CText, CImage } from '@chakra-ui/vue'
import NotificationCircle from "~/components/UI/NotificationCircle.vue"
import SearchBox from "~/components/DashBoard/SearchBox"
import NotificationBell from "~/components/UI/NotificationBell"
export default {
    name: 'TopHeader',
    components: {
        CFlex,
        CHeading,
        CIcon,
        CImage,
        CText,
        NotificationCircle,
        SearchBox,
        // CButton,
        // CButtonGroup,
        NotificationBell
    }
}
</script>