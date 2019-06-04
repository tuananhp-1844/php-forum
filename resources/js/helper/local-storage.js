export function getToken() {
    return localStorage.getItem('token');
}

export function getExpires() {
    return localStorage.getItem('expires_in');
}

export function checkToken() {
    if (getToken() == null) {
        return false
    } else {
        return true;
    }
}

export function setToken(token) {
    localStorage.setItem('token', token)
}

export function clearLocalStorage() {
    localStorage.removeItem('token')
}

export function setExpires(expires) {
    localStorage.setItem('expires_in', expires)
}

export function checkExpires() {
    if(getExpires() > Math.floor(Date.now() / 1000)) {
        return true
    }
    return false
}
