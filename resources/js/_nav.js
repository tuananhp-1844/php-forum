export default {
    items: [
        {
            name: 'Dashboard',
            url: '/dashboard',
            icon: 'icon-speedometer',
            badge: {
                variant: 'primary',
                text: 'NEW'
            }
        },
        {
            title: true,
            name: 'User',
            class: '',
            wrapper: {
                element: '',
                attributes: {}
            }
        },
        {
            name: 'Member',
            url: '/user',
            icon: 'icon-user'
        },
        {
            name: 'Admin',
            url: '/admin',
            icon: 'icon-user'
        },
        {
            title: true,
            name: 'Content',
            class: '',
            wrapper: {
                element: '',
                attributes: {}
            }
        },
        {
            name: 'Question',
            url: '/question',
            icon: 'icon-question',
        },
        {
            name: 'Post',
            url: '/post',
            icon: 'icon-pencil',
        },
        {
            name: 'Tag',
            url: '/tag',
            icon: 'icon-puzzle',
        },
        {
            name: 'Category',
            url: '/category',
            icon: 'icon-list',
        }
    ]
}
