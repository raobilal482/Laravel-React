import React from 'react';
import { Table, Button, Space, Card } from 'antd';
import { EditOutlined, DeleteOutlined } from '@ant-design/icons';
import { useProperties } from '../hooks/useProperties';
import { useDeleteProperties } from '../hooks/useDeleteProperties';
import { useNavigate } from 'react-router-dom';
const PropertyList = () => {
  const { data, isLoading, isError, error } = useProperties();
  const deleteProperty = useDeleteProperties();
  const navigate = useNavigate();
    console.log(data)
  const columns = [
    {
      title: 'Sr',
      dataIndex: 'id',
      key: 'id',
    },
      {
      title: 'Property Name',
      dataIndex: 'name',
      key: 'name',
    },
    {
      title: 'Type',
      dataIndex: 'type',
        key: 'type',
      render: (text) => <span style={{ textTransform: 'capitalize' }}>{text}</span>
    },
   {
    title: 'Type',
    render: (_, record) => record.types ? record.types.name : 'N/A',
    key: 'types',
    },
    {
      title: 'Owner Name',
      render: (_, record) => record.owner ? record.owner.name : 'N/A',
      key: 'status',
    },
    {
      title: 'Actions',
      key: 'actions',
      render: (_, record) => (
        <Space size="middle">
          <Button icon={<EditOutlined />} onClick={() => navigate(`/property/edit/${record.id}`)} type="link">Edit</Button>
          <Button icon={<DeleteOutlined />} onClick={() => deleteProperty.mutate(record.id)} type="link" danger>Delete</Button>
        </Space>
      ),
    },
  ];

  if (isError) return <div>Error: {error.message}</div>;

  return (
    <Card title="Properties List" extra={<Button onClick={()=> navigate('/properties/create')} type="primary">Add Property</Button>}>
      <Table 
        columns={columns} 
        dataSource={data} 
        loading={isLoading} 
        rowKey="id" 
      />
    </Card>
  );
};

export default PropertyList;