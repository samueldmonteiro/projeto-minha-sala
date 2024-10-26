import { Avatar, Menu, MenuItem } from '@mui/material';
import * as React from 'react';
import UserImage from '../../../assets/user.jpg';
import AccountCircleIcon from '@mui/icons-material/AccountCircle';
import LogoutIcon from '@mui/icons-material/Logout';
import { NavLinks } from './styles';
import { Link } from 'react-router-dom';

const UserIconMenu = () => {

    const [anchorEl, setAnchorEl] = React.useState(null);
    const open = Boolean(anchorEl);
    const handleClick = (event) => {
        setAnchorEl(event.currentTarget);
    };
    const handleClose = () => {
        setAnchorEl(null);
    };

    return (
        <>
            <Avatar src={UserImage} sx={{ width: 36, height: 36 }} id="basic-button"
                aria-controls={open ? 'basic-menu' : undefined}
                aria-haspopup="true"
                aria-expanded={open ? 'true' : undefined}
                onClick={handleClick}>
            </Avatar>
            <Menu
                id="basic-menu"
                anchorEl={anchorEl}
                open={open}
                onClose={handleClose}
                MenuListProps={{
                    'aria-labelledby': 'basic-button',
                }}
            >
                <NavLinks>
                    <Link to="/">
                        <MenuItem onClick={handleClose}><AccountCircleIcon />Meu Perfil</MenuItem>
                    </Link>
                    <Link to="/">
                        <MenuItem onClick={handleClose}><LogoutIcon />Sair</MenuItem>
                    </Link>
                </NavLinks>

            </Menu>
        </>
    );
};

export default UserIconMenu;
