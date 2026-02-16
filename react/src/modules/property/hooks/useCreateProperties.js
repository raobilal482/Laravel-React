import { useQueryClient, useMutation } from "@tanstack/react-query";
import api  from "../../../api/axios";
import { createProperty } from "../../../api/property.api";
import { message } from "antd";
import { useNavigate } from "react-router-dom";


export default function useCreateProperties() {
    const queryClient = useQueryClient();
    const navigate = useNavigate();
    return useMutation({
        mutationFn: (data) => createProperty(data),
        onSuccess: () => {
            message.success('New Property Created')
            navigate('/properties');
            queryClient.invalidateQueries(['properties']);
         },
        onError: (err) => { 
            message.error(err.message);
            console.error("Backend Error:", err.response?.data);
        }
    })
 }
