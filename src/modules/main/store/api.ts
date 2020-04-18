import {post} from "@/services/http";

export const appAPI = {
  login: post<Login>('/login')
};
