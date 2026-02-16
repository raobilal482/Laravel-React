import React from "react";
import {
  Form,
  Input,
  InputNumber,
  Select,
  DatePicker,
  Checkbox,
  Row,
  Col,
  Divider,
  Button,
} from "antd";
import { useNavigate } from "react-router-dom";
import { useEffect } from "react";

const { Options } = Select;
const TypeForm = ({ form, onFinish, initialValues, isLoading}) =>  { 

   return (
       <Form
         form={form}
         layout="vertical"
         onFinish={onFinish}
         initialValues={initialValues}
       >
         <Divider titlePlacement="left">Basic Info</Divider>
         <Row gutter={16}>
           <Col span={12}>
             <Form.Item
               name="name"
               label="Type Name"
               rules={[{ required: true }]}
             >
               <Input placeholder="e.g. Semi Detach Residential" />
             </Form.Item>
           </Col>
           <Col span={12}>
             <Form.Item name="type" label="Listing Type">
               <Select>
                 <Option value="property">Property</Option>
                 <Option value="unit">Unit</Option>
               </Select>
             </Form.Item>
           </Col>
         </Row>
         <Form.Item>
           <Button
             type="primary"
             htmlType="submit"
             loading={isLoading}
             block
             size="large"
           >
             Save Property
           </Button>
         </Form.Item>
         <Button onClick={() => navigate('/properties')} style={{ marginRight: 8 }}>
     Cancel
   </Button>
       </Form>
       
     );
}

export default TypeForm;