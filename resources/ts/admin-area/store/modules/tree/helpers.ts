export const applyToListByParent = (
    list: {children: [], id: number}[],
    parent: string,
    callback: Function,
): any => {
    for (const item of list) {
        if(parent === 'root') {
            return callback(list)
        } else if (
            String(item.id) === parent
            && item.hasOwnProperty('children')
        ) {
            return callback(item.children)
        } else if (item.hasOwnProperty('children')) {
            applyToListByParent(item.children, parent, callback)
        }
    }
}
