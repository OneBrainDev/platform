import type { InlinePosition, BlockPosition, ThemeSizes } from '@/types/global'

export { default as DsGroup } from './DsGroup.vue'
export type GroupType = 'stack' | 'cluster'

export type GroupProps = {
   type?: GroupType
   gap?: ThemeSizes
   inline?: InlinePosition
   block?: BlockPosition
   wrap?: boolean
}
