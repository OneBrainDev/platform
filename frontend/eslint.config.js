import globals from 'globals'
import pluginJs from '@eslint/js'
import tseslint from 'typescript-eslint'
import pluginVue from 'eslint-plugin-vue'

export default [
  {
    files: ['**/*.{js,mjs,cjs,ts,vue}'],
  },
  { ignores: ['**/.vitepress', '**/node_modules', '**/e2e', '**/dist', 'pnpm-lock.yaml', '**/.storybook', '**/storybook-static', '*.spec.{js,ts}', '*.stories.{js,ts}'] },
  {
    languageOptions: {
      globals: globals.browser,
    },
  },
  pluginJs.configs.recommended,
  ...tseslint.configs.recommended,
  ...pluginVue.configs['flat/essential'],
  { files: ['**/*.vue'], languageOptions: { parserOptions: { parser: tseslint.parser } } },
]
