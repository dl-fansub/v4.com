import { Model } from '@vuex-orm/core'

export default class DasboardUpdated extends Model {
  static get entity () { return 'dashboard-updated' }
  static fields () {
    return {
      type: this.attr(0),
      name: this.attr(''),
      episode: this.attr(0),
      season: this.attr(0),
      finish: this.attr(false),
      addon: this.attr({})
    }
  }
}
