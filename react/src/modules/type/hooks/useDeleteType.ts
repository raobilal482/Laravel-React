import { deletetype } from "../../../api/type.api";
import { useMutation,useQueryClient } from "@tanstack/react-query";

export default function useDeleteTypes() { 
    const query = useQueryClient()
    return useMutation({
        mutationFn: deletetype,
        onSuccess: () => {
            console.log("Type Deleted");
            query.invalidateQueries({queryKey: ['types']});
        },
        onError: (err) => { 
            console.log(err);
        }
    })

}