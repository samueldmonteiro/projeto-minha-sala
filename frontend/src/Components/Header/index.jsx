import * as React from 'react';
import AppBar from '@mui/material/AppBar';
import Box from '@mui/material/Box';
import Divider from '@mui/material/Divider';
import Drawer from '@mui/material/Drawer';
import IconButton from '@mui/material/IconButton';
import List from '@mui/material/List';
import ListItem from '@mui/material/ListItem';
import ListItemButton from '@mui/material/ListItemButton';
import ListItemText from '@mui/material/ListItemText';
import MenuIcon from '@mui/icons-material/Menu';
import Toolbar from '@mui/material/Toolbar';
import Typography from '@mui/material/Typography';
import Button from '@mui/material/Button';
import { Avatar, Menu, MenuItem } from '@mui/material';
import { HeaderContainer, NavLinks, Logo, UserAvatar } from './styles';
import { Link, Navigate, useNavigate } from 'react-router-dom';
import LogoImage from '../../assets/logo.png'
import UserIconMenu from './UserIconMenu';
import InfoIcon from '@mui/icons-material/Info';
import HomeIcon from '@mui/icons-material/Home';
import CalendarMonthIcon from '@mui/icons-material/CalendarMonth';
import useAuth from '../../Hooks/useAuth';

const drawerWidth = 240;

const navItems = [
    <Link to="/"><HomeIcon /> Home</Link>,
    <Link to="/calendario"><CalendarMonthIcon /> Calendário</Link>,
    <Link to="/sobre"><InfoIcon /> Sobre</Link>,
];


const navItemsMobile = [
    <Link to="/"><HomeIcon /> Home</Link>,
    <Link to="/calendario"><CalendarMonthIcon /> Calendário</Link>,
    <Link to="/sobre"><InfoIcon /> Sobre</Link>,

];

export const Header = (props) => {

    const { isLogged } = useAuth();
    if (!isLogged) return <Navigate to="/entrar" />;

    const { window } = props;
    const [mobileOpen, setMobileOpen] = React.useState(false);

    const handleDrawerToggle = () => {
        setMobileOpen((prevState) => !prevState);
    };

    const drawer = (
        <Box onClick={handleDrawerToggle} sx={{ textAlign: 'center' }}>
            <Typography variant="h6" sx={{ my: 2 }}>
                <Link to="/">
                    <Logo src={LogoImage} />
                </Link>
            </Typography>
            <Divider />
            <NavLinks>
                <List>
                    {navItemsMobile.map((item, key) => (
                        <ListItem key={key} disablePadding>
                            <ListItemButton sx={{ textAlign: 'center' }}>
                                <ListItemText>
                                    {item}
                                </ListItemText>

                            </ListItemButton>
                        </ListItem>
                    ))}
                </List>
            </NavLinks>
        </Box>
    );

    const container = window !== undefined ? () => window().document.body : undefined;

    return (

        <Box sx={{ display: 'flex' }}>
            <AppBar component="nav" >

                <HeaderContainer>
                    <Toolbar>
                        <IconButton
                            color="inherit"
                            aria-label="open drawer"
                            edge="start"
                            onClick={handleDrawerToggle}
                            sx={{ mr: 2, display: { sm: 'none' } }}
                        >
                            <MenuIcon />
                        </IconButton>

                        <UserAvatar>                              <UserIconMenu />
                        </UserAvatar>

                        <Typography
                            variant="h6"
                            component="div"
                            sx={{ flexGrow: 1, display: { xs: 'none', sm: 'block' } }}
                        >
                            <Link to="/">
                                <Logo src={LogoImage} />
                            </Link>
                        </Typography>
                        <NavLinks>
                            <Box sx={{ display: { xs: 'none', sm: 'block' } }}>
                                {navItems.map((item, index) => (
                                    <Button key={index}>
                                        {item}
                                    </Button>
                                ))}
                                <Button>
                                    <UserIconMenu />
                                </Button>
                            </Box>
                        </NavLinks>

                    </Toolbar>
                </HeaderContainer>
            </AppBar>
            <nav>
                <Drawer
                    container={container}
                    variant="temporary"
                    open={mobileOpen}
                    onClose={handleDrawerToggle}
                    ModalProps={{
                        keepMounted: true,
                    }}
                    sx={{
                        display: { xs: 'block', sm: 'none' },
                        '& .MuiDrawer-paper': { boxSizing: 'border-box', width: drawerWidth },
                    }}

                >
                    {drawer}

                </Drawer>
            </nav>
        </Box>
    );
}


export default Header;
