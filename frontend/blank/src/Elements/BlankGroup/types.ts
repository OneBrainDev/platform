import type { Position, Size, ObjectValues } from '@/types'

export const GROUP_MAP = {
   STACK: 'stack',
   CLUSTER: 'cluster',
} as const

export type Group = ObjectValues<typeof GROUP_MAP>

export type GroupProps = {
   stack?: boolean
   cluster?: boolean
   gap?: Size
   inline?: Position
   block?: Position
   wrap?: boolean
}
