export interface IPage {
    name: string,
    title: string,
    page_type: {
        model: string
    }
    pageable: {
        spacial_text: string
    },
}
