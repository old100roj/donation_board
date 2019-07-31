export default {
  has (object, prop) {
    return Object.prototype.hasOwnProperty.call(object, prop)
  }
}
