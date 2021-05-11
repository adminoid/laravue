export default {
    namespaced: true,

    state: () => ({
        tree: [
            {
                id: 1,
                name: "task 1",
                children: [
                    {
                        id: 2,
                        name: "task 2",
                        children: []
                    }
                ]
            },
            {
                id: 3,
                name: "task 3",
                children: [
                    {
                        id: 4,
                        name: "task 4",
                        children: [
                            {
                                id: 6,
                                name: "task 6",
                                children: []
                            }
                        ]
                    }
                ]
            },
            {
                id: 5,
                name: "task 5",
            },
        ]
    }),
}
