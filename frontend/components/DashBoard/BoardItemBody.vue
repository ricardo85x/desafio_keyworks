<template>
  <CBox h="330px">
    <CFlex
      direction="column"
      m="2"
      rounded="4"
      p="4"
      bg="white"
      h="313px"
      box-shadow="0px 0px 4px 4px rgba(1,1,1,0.1)"
      grid-gap="2"
    >
      <CFlex direction="row" align="center" justify="space-between">
        <CText
          border="1px"
          border-color="gray.400"
          p="1"
          rounded="5"
          font-size="0.8rem"
          font-weight="bold"
          color="gray.500"
        >
          {{ $attrs.item.tag }}
        </CText>

        <CBox align="right">
          <CText font-size="0.7rem" color="gray.500">Código</CText>
          <CText font-size="0.9rem" color="gray.900"
            >#{{ $attrs.item.code }}</CText
          >
        </CBox>
      </CFlex>

      <CText font-size="0.9rem" font-weight="bold" color="gray.800">{{
        $attrs.item.title
      }}</CText>

      <CFlex direction="row" align="center" justify="space-between">
        <CBox align="left">
          <CText font-size="0.7rem" color="gray.500">Projeto</CText>
          <CText font-size="0.9rem" color="gray.900">{{
            $attrs.item.project
          }}</CText>
        </CBox>

        <CBox align="right">
          <CText font-size="0.7rem" color="gray.500">Prevista</CText>
          <CFlex grid-gap="1" align="center">
            <CImage size="17px" :src="require('~/assets/calendar.png')" />
            <CText font-size="0.9rem" color="gray.900">{{
              $attrs.item.expected_date
            }}</CText>
          </CFlex>
        </CBox>
      </CFlex>

      <CBox align="left">
        <CText font-size="0.7rem" color="gray.500">Descrição</CText>
        <CBox
          white-space="nowrap"
          overflow="hidden"
          text-overflow="ellipsis"
          min-width="0"
          font-size="0.9rem"
          color="gray.900"
          :title="$attrs.item.description"
          >{{ $attrs.item.description }}</CBox
        >
      </CBox>

      <CFlex align="center">
        <CBox w="5" height="1px" bg="gray.500" />
        <CBox flex-wrap="wrap" my="0" mx="10px" text-align="center"
          ><CText font-size="0.8rem" color="gray.500"> Acompanhamento</CText>
        </CBox>
        <CBox flex="1" height="1px" bg="gray.500" />
      </CFlex>

      <CFlex direction="row" align="center" justify="space-between">
        <CBox align="left">
          <CText font-size="0.7rem" color="gray.500">Previsto</CText>
          <CFlex grid-gap="1" align="center">
            <CImage size="17px" :src="require('~/assets/clock.png')" />
            <CText font-size="0.9rem" color="gray.900">{{
              $attrs.item.expected
            }}</CText>
          </CFlex>
        </CBox>

        <CButton
          :bg="$attrs.item.statusInfo.color"
          :color="$attrs.item.statusInfo.textColor"
          :_hover="{ filter: 'brightness(130%)' }"
          box-shadow="2px 4px 4px 2px rgba(1,1,1,0.2)"
        >
          {{ $attrs.item.statusInfo.title }}
        </CButton>
      </CFlex>

      <CFlex direction="row" align="center" justify="space-between">
        <CBox align="left">
          <CText font-size="0.7rem" color="gray.500">Saldo</CText>
          <CFlex grid-gap="1" align="center">
            <CImage size="17px" mr="1" :src="require('~/assets/clock.png')" />
            <CButton
              size="xs"
              :bg="$attrs.item.statusInfo.color"
              :color="$attrs.item.statusInfo.textColor"
              :_hover="{ filter: 'brightness(130%)' }"
            >
              {{ $attrs.item.balance }}
            </CButton>
          </CFlex>
        </CBox>

        <CBox align="left">
          <CText font-size="0.7rem" color="gray.500">Equipe</CText>
          <CFlex grid-gap="1" align="center" justify="flex-end">
            <NotificationCircle
              v-for="team in $attrs.item.team"
              :key="team"
              bg="gray.500"
              w="5"
              h="5"
              font-size="12"
              color="gray.50"
              >{{ team }}</NotificationCircle
            >
          </CFlex>
        </CBox>
      </CFlex>
    </CFlex>
  </CBox>
</template>

<script>
import { CFlex, CBox, CText, CImage } from '@chakra-ui/vue'
import NotificationCircle from '~/components/UI/NotificationCircle'

export default {
  name: 'BoardItemBody',
  components: {
    CFlex,
    CBox,
    CText,
    CImage,
    NotificationCircle,
  },

  data() {
    return {}
  },
}
</script>