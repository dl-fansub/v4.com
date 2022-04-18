import { InjectionKey } from 'vue'
import { createStore, Store } from 'vuex'

export interface State {
  darkMode: Boolean
}

export const key: InjectionKey<Store<State>> = Symbol()

export const store = createStore<State>({
  state: {
    darkMode: false
  }
})