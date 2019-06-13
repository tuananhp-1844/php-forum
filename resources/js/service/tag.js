import { HTTP } from '@/base-axios'

export function getTag(page = 1) {
    return HTTP.get('tags', {
        params: {
            page
        }
    })
}

export function createTag(tag) {
    return HTTP.post('tags', tag)
}

export function updateTag(tag) {
    return HTTP.put('tags/' + tag.id, tag)
}

export function destroyTag(tag) {
    return HTTP.delete('tags/' + tag.id)
}

export function showTag(tag) {
    return HTTP.get('tags/' + tag.id)
}
