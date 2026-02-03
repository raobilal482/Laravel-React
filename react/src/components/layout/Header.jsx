import { Layout, Button } from "antd";
import { PlusCircleOutlined } from '@ant-design/icons';

const { Header } = Layout;

const AppHeader = () => {
  return (
    <Header className="bg-white px-6 flex items-center justify-between shadow-sm">
      <h1 className="text-xl font-semibold text-gray-800">
        Dashboard
      </h1>

      <Button type="primary" danger size="large" shape="round">
        Logout  <PlusCircleOutlined />
      </Button>
    </Header>
  );
};

export default AppHeader;
