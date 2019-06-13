import { HTTP } from '@/base-axios'

export function getCategory(page = 1) {
    return HTTP.get('categories', {
        params: {
            page
        }
    })
}

export function showCategory(category) {
    return HTTP.get('categories/' + category.id)
}

export function createCategory(category) {
    return HTTP.post('categories', category)
}

export function updateCategory(category) {
    return HTTP.put('categories/' + category.id, category)
}

export function destroyCategory(category) {
    return HTTP.delete('categories/' + category.id)
}
