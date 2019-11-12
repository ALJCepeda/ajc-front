import {Login} from "ajc-shared/src/app.api";
import {post} from "@/services/http";

export const appAPI = {
  login: post<Login>('/login')
};
