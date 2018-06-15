import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  query: '',
  results: []
}

// getters
export const getters = {
  query: state => state.query,
  results: state => state.results
}

// mutations
export const mutations = {
  [types.UPDATE_RESULTS] (state, { query, results }) {
    console.log('update results: ' + query)
    state.query = query
    state.results = results
  }
}

// actions
export const actions = {
  async execute ({ commit }, { query }) {
    console.log('executing search: ' + query)

    try {
      const { data } = await axios.get('/api/pet/search/' + query)
      commit(types.UPDATE_RESULTS, { query: query, results: data })
    } catch (e) {
      commit(types.UPDATE_RESULTS)
    }
  }
}
