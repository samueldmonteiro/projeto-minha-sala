import { Avatar, Menu, MenuItem } from '@mui/material';
import UserImage from '../../../assets/user.jpg';
import AccountCircleIcon from '@mui/icons-material/AccountCircle';
import LogoutIcon from '@mui/icons-material/Logout';
import { NavLinks } from './styles';
import { Link } from 'react-router-dom';
import Button from '@mui/material/Button';
import Dialog from '@mui/material/Dialog';
import DialogActions from '@mui/material/DialogActions';
import DialogContent from '@mui/material/DialogContent';
import DialogContentText from '@mui/material/DialogContentText';
import Slide from '@mui/material/Slide';
import useAuth from '../../../Hooks/useAuth';
import { forwardRef, useState } from 'react';

const Transition = forwardRef(function Transition(props, ref) {
    return <Slide direction="up" ref={ref} {...props} />;
});

const UserIconMenu = () => {

    const [anchorEl, setAnchorEl] = useState(null);
    const open = Boolean(anchorEl);
    const handleClick = (event) => {
        setAnchorEl(event.currentTarget);
    };
    const handleClose = () => {
        setAnchorEl(null);
    };

    const [openLogoutModal, setOpenLogoutModal] = useState(false);

    const handleClickOpenLogoutModal = () => {
        handleClose();
        setOpenLogoutModal(true);
    };

    const {logout, user} = useAuth();

    const handleCloseLogoutModal = () => {
        setOpenLogoutModal(false);
    };

    const confirmLogout = () => {
        logout();
    }

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
                        <MenuItem onClick={handleClickOpenLogoutModal}><LogoutIcon />Sair</MenuItem>
                    </Link>
                </NavLinks>

            </Menu>

            <Dialog
                open={openLogoutModal}
                TransitionComponent={Transition}
                keepMounted
                onClose={handleCloseLogoutModal}
                aria-describedby="alert-dialog-slide-description"
            >
                <DialogContent>
                    <DialogContentText id="alert-dialog-slide-description">
                        Certeza que deseja sair?
                    </DialogContentText>
                </DialogContent>
                <DialogActions>
                    <Button onClick={handleCloseLogoutModal}>Cancelar</Button>
                    <Button onClick={confirmLogout}>Sair</Button>
                </DialogActions>
            </Dialog>
        </>


    );
};

export default UserIconMenu;
