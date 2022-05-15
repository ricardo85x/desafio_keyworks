<template>
    <CFlex
        direction="row"
        bg="green.500"
        justify="space-between"
        p="4"
        rounded-top-left="15px"
        rounded-bottom-right="15px"
        mb="2"
    >
        <CText 
        font-size="md" 
        font-weight="bold" 
        color="gray.50"
        >
            {{ $attrs.category }}
        </CText>
        <CFlex
            direction="row"
            align="center"
            
        >
            <CIcon name="clock" color="gray.50"/>

            <CText color="gray.50"  ml="1" mr="2">
               {{ $attrs.time }}
            </CText>

            <NotificationCircle
               
                bg="gray.50"
                w="5" h="5"
                font-size="15"
                color="green.500"

            >{{$attrs.count}}</NotificationCircle>
        </CFlex>

    </CFlex>
</template>

<script>
import { CFlex, CText, CIcon } from '@chakra-ui/vue'
import NotificationCircle from "~/components/UI/NotificationCircle"

export default {
    name: 'TopHeader',
    components: {
        CFlex,
        CText,
        CIcon,
        NotificationCircle
    },
    data(){
        return { }
    },
    
}
</script>