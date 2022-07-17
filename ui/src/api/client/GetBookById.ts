import { AxiosResponse } from "axios";
import { AxiosClient } from './AxiosClient';

class GetBookById {
    static async run(
        id: string,
    ): Promise<AxiosResponse> {
        return await AxiosClient.get(`book/${id}`);
    }
}

export { GetBookById };
