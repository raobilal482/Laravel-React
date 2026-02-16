import { Button, Space, Table } from "antd";
import { IListingType } from "../../../types/listingTypes";
import useTypes from "../hooks/useTypes";
import type { ColumnsType } from "antd/es/table";
import { DeleteOutlined, EditOutlined } from "@ant-design/icons";
import useDeleteTypes from "../hooks/useDeleteType";
import { useNavigate } from "react-router-dom";



export default function TypeList() {
    const { data, isLoading } = useTypes(); 
    const deletetype = useDeleteTypes();
    const navigate = useNavigate();

    const columns: ColumnsType<IListingType> = [
        {
            title: "ID",
            dataIndex: "id",
            key: "id",
            width: "20"
        },
        {
            title: "name",
            dataIndex: "name",
            key: "name",
            sorter: (a, b) => a.name.localeCompare(b.name)
        },
        {
            title: "type",
            dataIndex: "type",
            key: "type",
            render: (text) => <span style={{ textTransform: 'capitalize' }}>{text}</span>,
            ellipsis: true,
        },
        {
            title: "Actions",
            key: "actions",
            fixed: "right",
            width: "150",
            render: (_, record) => (
                <Space size="middle">
                    <Button type="text" onClick={() => navigate(`/types/edit/${ record.id }`)} icon={<EditOutlined style={{ color: '#1890ff' }} />} />
                    <Button type="text" onClick={() => record.id && deletetype.mutate(record.id)} danger icon={<DeleteOutlined />} />
                </Space>
            ),
        }

    ];

    return (
        <>
            <div>
                <Button onClick={() => navigate('/types/create')}>Add </Button>
                <Table
                columns={columns}
                dataSource={data}
                loading={isLoading}
                rowKey="id"
                pagination={{ pageSize: 10 }}
                bordered
                
            />    
            </div>
            
        </>
    );
}