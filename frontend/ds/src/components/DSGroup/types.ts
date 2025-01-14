import type { InlinePlacement, BlockPlacement, NamedSize } from '@/types'

export type GroupType = 'stack' | 'cluster'

export type GroupProps = {
   type: GroupType
   gap: NamedSize
   inline: InlinePlacement
   block: BlockPlacement
   wrap?: boolean
}
