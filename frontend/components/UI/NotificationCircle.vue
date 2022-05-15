<template>
    <CFlex 
        border-radius="50%" 
        align="center" 
        justify="center"

        :w="$attrs.w || '8'" 
        :h="$attrs.h || '8'" 
        :font-size="$attrs['font-size'] || '20'" 
        :font-weight="$attrs.fontWeight || 'bold'"
        :color="$attrs.color || 'gray.100'"
        :bg="$attrs.bg || '#3a5138'"
    >
        <slot />
    </CFlex>

</template>

<script>

import { CFlex } from '@chakra-ui/vue'

export default {
    name: "NotificationCircle",
    components: {
        CFlex,
    }
}
</script>
