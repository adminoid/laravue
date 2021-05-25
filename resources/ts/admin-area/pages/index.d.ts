export interface IPage {
    name: string,
    title: string,
    slug: string,
    page_type: {
        model: string,
    }
    pageable: {
        spacial_text: string
        standard_text: string
    },
}
