import ToCase from 'to-case'

export default {
  getQueryObj (object) {
    const query = {}
    for (const prop of Object.keys(object)) {
      if (object[prop] !== null) {
        query[ToCase.snake(prop)] = object[prop]
      }
    }
    return query
  },
  getQueryStr (object) {
    let str = '?'
    for (const prop of Object.keys(object)) {
      if (object[prop] !== null) {
        str += prop + '=' + object[prop] + '&'
      }
    }

    if (str === '?') {
      return '?'
    }

    return str.slice(0, -1)
  }
}
