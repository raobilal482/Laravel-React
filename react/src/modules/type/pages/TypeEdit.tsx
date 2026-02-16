import { useParams } from "react-router-dom";
import useType from "../hooks/useType";
import { Form } from "antd";

export default function TypeList() {
    const { id } = useParams();
    const { form } = Form.useForm();

    const { data, isError, isLoading } = useType(typeId)

    return (
        <>
            
        </>
    );
}