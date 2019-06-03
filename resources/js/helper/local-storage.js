export function getToken() {
    return localStorage.getItem('token');
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
