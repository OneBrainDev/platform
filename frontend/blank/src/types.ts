export type ObjectValues<T> = T[keyof T]

export const POSITION_MAP = {
   START: 'start',
   MIDDLE: 'middle',
   END: 'end',
   AROUND: 'around',
   BETWEEN: 'between',
   EVENLY: 'evenly',
   FULL: 'full',
   BASELINE: 'baseline',
} as const

export const SIZE_MAP = {
   NONE: 'none',
   XX_SMALL: 'xxsmall',
   X_SMALL: 'xsmall',
   SMALL: 'small',
   MEDIUM: 'medium',
   X_LARGE: 'xlarge',
   XX_LARGE: 'xxlarge',
} as const

// export type InputPicker = 'checkbox' | 'radio'
// export type InputText = 'text' | 'email' | 'number' | 'password'

export type Position = ObjectValues<typeof POSITION_MAP>
export type Size = ObjectValues<typeof SIZE_MAP>
