export default async function () {
        const response = await fetch('http://api.weeb-tapes.de/api/checkpermission', {
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('authToken')}`,
            },
        });

        if (response.ok) {
            return
        }
        else {
        return navigateTo('/loginform')
        }
}