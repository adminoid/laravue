export default {
    namespaced: true,

    state: () => ({
        children: [
            {
                id: 1,
                name: "Shrek",
                children: []
            },
            {
                id: 2,
                name: "Fiona",
                children: [
                    {
                        id: 4,
                        name: "Lord Peter",
                        children: []
                    },
                    {
                        id: 5,
                        name: "Prince Charming",
                        children: []
                    }
                ]
            },
            {
                id: 3,
                name: "Donkey",
                children: []
            }
        ],
    }),
}
