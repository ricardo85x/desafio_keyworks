<template>
    <CFlex
        width="100%" wrap="nowrap" align="center" justify="center"
    >
        <CBox 
            v-if="$attrs.selected"  
            position="absolute" 
            left="0.8" 
            h="26px" 
            border-left="6px solid black" 
        />
        <CTooltip :label="$attrs.label">
            <CIcon 
                :_hover="$attrs['no-hover'] ? {} : { color: $attrs['hover-color'] || 'gray.100', cursor: 'pointer' }"
                :name="$attrs.name" 
                size="26" 
                :color="!!$attrs.selected ? 'gray.900' :  '#3a5138'"
            />
        </CTooltip>

       
    </CFlex>
</template>

<script>

import { CFlex, CBox, CIcon, CTooltip } from '@chakra-ui/vue'

export default {
    name: "SideBarIcon",
    components: {
        CIcon,
        CFlex,
        CBox,
        CTooltip
    }
}
</script>
