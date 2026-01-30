import { Layout, Button } from "antd";

const { Header } = Layout;

const AppHeader = () => {
  return (
    <Header className="bg-white px-6 flex items-center justify-between shadow-sm">
      {/* Left side */}
      <h1 className="text-xl font-semibold text-gray-800">
        Dashboard
      </h1>

      {/* Right side */}
      <Button type="primary">
        Logout
      </Button>
    </Header>
  );
};

export default AppHeader;
