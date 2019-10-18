module.exports = {
  root: true,
  env: {
    "node": true
  },
  parserOptions: {
    "parser": "babel-eslint",
    "ecmaVersion": 2017,
    "sourceType": "module"
  },
  // https://github.com/feross/standard/blob/master/RULES.md#javascript-standard-style
  extends: [
    "plugin:vue/base",
    "plugin:vue/essential",
    "eslint:recommended"
  ],
  // required to lint *.vue files
  plugins: [
    "vue"
  ],
  // add your custom rules here
  'rules': {
    // allow paren-less arrow functions
    'arrow-parens': 0,
    // allow async-await
    'generator-star-spacing': 0,
    // allow debugger during development
    'no-debugger': process.env.NODE_ENV === 'production' ? 2 : 0,
    semi: ['error', 'always'],
    'space-before-function-paren': ['error', 'never'],
    'no-console': 0,
    'vue/require-v-for-key': 'off'
  }
};
