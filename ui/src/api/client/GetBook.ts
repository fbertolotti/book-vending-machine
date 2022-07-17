import { AxiosResponse } from "axios";
import { AxiosClient } from './AxiosClient';

class GetBook {
    static async run(
        title: null|string = null,
        author: null|string = null,
        isbnCode: null|string = null,
    ): Promise<AxiosResponse> {
        return await AxiosClient.get('book', {
            params: {
                title,
                author,
                'isbn-code': isbnCode,
            },
        });
    }
}

export { GetBook };
