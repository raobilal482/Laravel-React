import { useQuery } from "@tanstack/react-query";
import { getSingleProperty } from "../../../api/property.api";

export const useProperty = (id) => {

    return useQuery({
        queryFn: () => getSingleProperty(id),
    });

 }