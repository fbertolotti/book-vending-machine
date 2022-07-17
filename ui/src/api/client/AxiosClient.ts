import axios, { type AxiosInstance, type AxiosRequestConfig } from 'axios';

const config: AxiosRequestConfig = {
    baseURL: 'http://api.bvm.localhost/api/v1',
    headers: {
        'Content-Type': 'application/json; charset=UTF-8',
    },
};

const AxiosClient: AxiosInstance = axios.create(config);

export { AxiosClient };
