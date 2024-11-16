// eslint.config.js
export default [
  {
    ignores: ["vendor/*", "node_modules/*", "public/*", "storage/*"],
  },
  {
    languageOptions: {
      ecmaVersion: "latest", // Use the latest ECMAScript standard
      sourceType: "module",
    },
    rules: {
      "no-unused-vars": "warn",
      "no-console": "off",
    },
  },
];
