const merge = require('webpack-merge')
const processEnv = process.env

module.exports = merge(processEnv, {
  API_URL: '"http://donationboard.loc"'
})
