# Blank Design System

The Blank Design System is meant to be a clean slate to build onto. It's goal is not to be feature complete, because that's silly, it's goal is to help you rapidly build components for your applications.

## Anatomy of an Element/Component Folder

Each component should have the same basic structure that is outlined below:

```
/BlankStack
  /composables          # remove if you don't have any composables
  /__tests__
    BlankStack.spec.ts  # don't use a __tests__ folder for 1 file
  BlankStack.vue
  index.ts              # export only the things you want to share
  types.ts              # remove if you don't have any types
```

## Blank Folder Structure

```
/Blank
  /assets
    /css
      reset.css
      tokens.css
      blank.css
    /images
  /types.ts
  /src
    /Composables
    /Elements
        # A lot of these come from the book EveryLayout, I've changed them slightly, in some cases, but they hold true to the spirit
        /BlankStack
        /BlankCluster
        /BlankFrame
        /BlankContainer
        /BlankIcon
        /BlankBox
        /BlankReel
    /Components
        /BlankFormControl
        /BlankText
        /BlankTextarea
        /BlankButton
        /BlankSlider
        /BlankSelect
        /BlankCheckbox
        /BlankRadio
        /BlankToggle
        /BlankTable
        /BlankDataTable
        /BlankHeader
    /Layouts
        /BlankSidebar
        /BlankHeaderBar
        /BlankDrawer
        /BlankFooterBar
```
